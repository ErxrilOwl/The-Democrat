var counterPara = 0;
var counterImg = 0;
var counterColImg = 0;
var limit = 10;
var curHeight = 80;
var arrSeq = new Array();

function loadImageFileAsURL(imageId, imageSel)
{
    var filesSelected = document.getElementById(imageSel).files;
    if (filesSelected.length > 0)
    {
        var fileToLoad = filesSelected[0];

        if (fileToLoad.type.match("image.*"))
        {
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoadedEvent) 
            {
                var img = "<img src='" + fileLoadedEvent.target.result.toString() + "''>";
                // var imageLoaded = document.createElement("img");
                // imageLoaded.src = fileLoadedEvent.target.result;
                document.getElementById(imageId).innerHTML = img;
                
                // document.getElementById("image").appendChild(imageLoaded);
            };
            fileReader.readAsDataURL(fileToLoad);
        }
    }
}

function addPara(){
    if(counterPara == limit){
        alert("You have reached the limit of adding");
    }
    else{
        var newdiv = document.createElement('div');
        counterPara++;
        newdiv.innerHTML = "<div class='row row-para' id='divPara"+ counterPara.toString() + "'>" + 
                            "<div class='row row-top'>" +
                                "<div class='col col-11'><input type='text' name='frmSecTitle[]' placeholder='Section Title...''></div>" +
                                "<div class='col col-1'><button type='button' onclick=" + "\"removePara(\'divPara"+counterPara.toString()+"\');\"" +" name'images[]'>X</button></div>" +
                                "<input type='text' name='paraNames[]' value='divPara"+counterPara.toString()+"' style='display:none'>" +
                            "</div>" +
                            "<div class='row row-center'>" +
                                "<textarea class='text' name='frmSecContent[]' placeholder='Write something here...'></textarea>" +
                            "</div></div>";
        newdiv.setAttribute('id',"divPara"+counterPara.toString());
        document.getElementById("row-main").appendChild(newdiv);
        curHeight += 50;
        document.getElementById("submission").style.height = curHeight.toString()+"vh";
        arrSeq.push("divPara"+counterPara.toString());
        document.getElementById("sequence").value = arrSeq.toString();
        document.getElementById("hideError").innerHTML += "";
    }
}

function removePara(divName){
    var d = document.getElementById('row-main');    
    var oldDiv = document.getElementById(divName);
    d.removeChild(oldDiv);
    counterPara--;
    curHeight -= 50;
    var i = arrSeq.indexOf(divName);
    arrSeq.splice(i, 1);
    document.getElementById("submission").style.height = curHeight.toString()+"vh";
}


function addImage(){
    if(counterImg == limit){
        alert("You have reached the limit of adding");
    }
    else{
        var newdiv = document.createElement('div');
        counterImg++;
        newdiv.innerHTML = "<div class='row image-row' id='divImg"+ counterImg.toString() +"'>" +
                            "<div class='image-block'>" +
                                "<button type='button' class='removeImage' onclick=\"removeImg("+ "\'divImg" + counterImg.toString() + "\');\">X</button>" +
                                "<div class='image' id=\"image"+ counterImg.toString() + "\"></div>" +
                                "<input type='file' id='selectedFile"+ counterImg.toString()+"' name='image[]' style='display: none;' onchange='loadImageFileAsURL(\"image"+ counterImg.toString() +"\", \"selectedFile"+counterImg.toString()+ "\")' accept='image/x-png, image/gif, image/jpeg' />"+
                                "<input type='button' class='btnUpload' value='Upload' onclick=\"document.getElementById("+ "\'selectedFile"+counterImg.toString()+"\'" + ").click()\"/>" +
                                "<input type='text' name='imgNames[]' value='divImg"+counterImg.toString()+"' style='display:none'>" +
                            "</div> </div>";
        newdiv.setAttribute('id',"divImg"+counterImg.toString());
        document.getElementById("row-main").appendChild(newdiv);
        curHeight += 50;
        document.getElementById("submission").style.height = curHeight.toString()+"vh";
        arrSeq.push("divImg"+counterImg.toString());
        document.getElementById("sequence").value = arrSeq.toString();
        document.getElementById("hideError").innerHTML += "";
    }
}


function removeImg(divName){
    var d = document.getElementById('row-main');    
    var oldDiv = document.getElementById(divName);
    d.removeChild(oldDiv);
    counterImg--;
    curHeight -= 50;
    var i = arrSeq.indexOf(divName);
    arrSeq.splice(i, 1);
    document.getElementById("submission").style.height = curHeight.toString()+"vh";
}

function addColImage(){
    var newdiv = document.createElement('div');
    counterColImg++;
    newdiv.innerHTML = "<div class='image-block' id='image-block"+counterColImg.toString()+"'><div class='image-box'>"+
                            "<button type='button' class='removeImage' onclick=\"removeColImg(\'image-block"+counterColImg.toString()+"\');\">X</button>"+
                            "<div class='image' id=\"image"+counterColImg.toString()+"\"></div>"+
                            "<input type='file' id='selectedFile"+counterColImg.toString()+"' name='image[]' style='display: none;' onchange='loadImageFileAsURL(\"image"+ counterColImg.toString() +"\", \"selectedFile"+counterColImg.toString()+ "\")' accept='image/x-png, image/gif, image/jpeg' />"+
                            "<input type='button' class='btnUpload' value='Upload' onclick=\"document.getElementById("+"\'selectedFile"+counterColImg.toString()+"\'"+").click();\">"+
                            "<input type='text' name='imgNames[]' value='img"+counterColImg.toString()+"' style='display:none'>"+
                        "</div></div>";
    newdiv.setAttribute('id',"image-block"+counterColImg.toString());
    document.getElementById("row-content").appendChild(newdiv);
    
    var count = document.querySelectorAll('.newCollection .row-main .image-block').length;
    var curHeight = 50 + (Math.ceil(count/4)*40);    
    document.getElementById("newCollection").style.height = curHeight.toString()+"vh";
    document.getElementById("hideError").innerHTML += "";
    
}

function removeColImg(divName){
    var d = document.getElementById('row-content');    
    var oldDiv = document.getElementById(divName);
    d.removeChild(oldDiv);
    var count = document.querySelectorAll('.newCollection .row-main .image-block').length;
    if(count <= 4){
        var curHeight = 80;
    }
    else{
        var curHeight = Math.ceil(count/4)*54;        
    }
    
    document.getElementById("newCollection").style.height = curHeight.toString()+"vh";
}