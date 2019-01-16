<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Translation Conversion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    textarea {
        font-size: 12px;
    }
    strong {
        margin: auto;
    }
    </style>
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center mt-5">Convert Translations<h1>
    <div class="container-fluid">
    <form class="form-group">
        <div class="row mt-5">
            <div class="col-3">
                <h3>Text pair to convert</h3>
                <textarea class="form-control" name="keypair" id="keypair" rows="20"></textarea>
            </div>
            <div class="col-1">
                <strong>>></strong>
            </div>   
            <div class="col-3">
                <h3>To Translate</h3>
                <textarea class="form-control" name="translatefile" id="translatefile" rows="20"></textarea>
            </div>
            <div class="col-1">
                <strong>=</strong>
            </div>            
            <div class="col-4">
                <h3>Result</h3>
                <textarea class="form-control" name="translateresult" id="translateresult" rows="20"></textarea>
            </div>
        </div> 
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <button type="button" id="btnGenerate" class="btn btn-primary" onclick="generateResult()">Generate</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script>
    let replace = document.getElementById('keypair')
    let file = document.getElementById('translatefile')
    let result = document.getElementById('translateresult')

    function generateResult(){
        executeReplace()
    }

    function executeReplace(){
        let textToReplace = replace.value;
        let textToCheck = file.value;
        let textReplaceConverted = JSON.parse(textToReplace)
        for(let text of textReplaceConverted){
            let keys = Object.keys(text)
            if(keys.length==2 && text[keys[1]]!=""){
                // no commas
                let option1 = '"'+text[keys[0]]+'"';
                let rep1 = '"'+text[keys[1]]+'"';

                let option2 = "'"+text[keys[0]]+"'";
                let rep2 = "'"+text[keys[1]]+"'";

                let option3 = "`"+text[keys[0]]+"`";
                let rep3 = "`"+text[keys[1]]+"`";

                // with commas
                let optionWithComma1 = '"'+text[keys[0]]+'",';
                let repWithComma1 = '"'+text[keys[1]]+'",';

                let optionWithComma2 = "'"+text[keys[0]]+"',";
                let repWithComma2 = "'"+text[keys[1]]+"',";

                let optionWithComma3 = "`"+text[keys[0]]+"`,";
                let repWithComma3 = "`"+text[keys[1]]+"`,";

                let reg1 = new RegExp(option1)
                let reg2 = new RegExp(option2)
                let reg3 = new RegExp(option3)
                let regWithComma1 = new RegExp(optionWithComma1)
                let regWithComma2 = new RegExp(optionWithComma2)
                let regWithComma3 = new RegExp(optionWithComma3)
                textToCheck = textToCheck.replace(reg1,rep1)
                textToCheck = textToCheck.replace(reg2,rep2)
                textToCheck = textToCheck.replace(reg3,rep3)
                textToCheck = textToCheck.replace(regWithComma1,repWithComma1)
                textToCheck = textToCheck.replace(regWithComma2,repWithComma2)
                textToCheck = textToCheck.replace(regWithComma3,repWithComma3)
            }
        }
        result.innerHTML=textToCheck;
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>