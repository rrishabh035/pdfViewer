
let pdfDoc = null,
    pageNum = 1,
    pageIsRendering = false,
    pageNumIsPending = null;

const scale = 2;
canvas = document.querySelector("#pdf-render"),
    ctx = canvas.getContext("2d");

//Render the page
const renderPage = num => {
    pageIsRendering = true;


    //get page
    pdfDoc.getPage(num).then(page => { 
        const viewport = page.getViewport({scale});
        canvas.height = viewport.height ;
        canvas.width = viewport.width;

        const renderCtx = {
            canvasContext: ctx,
            viewport:viewport
        }

        page.render(renderCtx).promise.then(() => {
            pageIsRendering = false;

            if(pageNumIsPending != null){
                renderPage(pageNumIsPending);
                pageNumIsPending = null;
            }
        });

        //output current page
        document.querySelector("#page-num").textContent = num;
    });
}

//check for page rendering
const queueRenderPage = num => {
    if(pageIsRendering == false){
        pageNumIsPending = num;
        renderPage(pageNumIsPending);
    } else{
        renderPage(null);
    }
}

//show previous page
const showPrevPage = ()=>{
    if(pageNum <= 1 ){
        return;
    }
    pageNum --;
    queueRenderPage(pageNum);
}

//show next page
const showNextPage = ()=>{
    if(pageNum >= pdfDoc.numPages ){
        return;
    }
    pageNum ++;
    queueRenderPage(pageNum);
}


//Get the document
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

pdfjsLib.getDocument(url).promise.then(pdfDoc_=>{
    pdfDoc = pdfDoc_;
    document.querySelector("#page-count").textContent = pdfDoc.numPages;
    renderPage(pageNum);

});

//button events
document.querySelector("#prev-page").addEventListener("click",showPrevPage);
document.querySelector("#next-page").addEventListener("click",showNextPage);
