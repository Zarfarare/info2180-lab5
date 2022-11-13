window.onload = function(){
    let LookUpbtn = document.querySelector("#lookup");
    let Citylookup = document.querySelector("#lookupCity")
    let result = document.querySelector("#result");
    
    
    LookUpbtn.onclick = (event)=>{
        event.preventDefault();
        let country = document.querySelector("#country").value;
        
        fetch(`http://localhost/info2180-lab5/world.php?country=${country.trim()}`)
        .then(response => {
            return response.text();
        })
        .then(data => {
            result.innerHTML = data;
        })
        .catch(err => {
            console.log(err);
        })
    }


    Citylookup.onclick = (event)=>{
        event.preventDefault();
        let country = document.querySelector("#country").value;

        fetch(`http://localhost/info2180-lab5/world.php?country=${country.trim()}&lookup=cities`)
        .then(response => {
            return response.text();
        })
        .then(data => {
            result.innerHTML = data;
        })
        .catch(err => {
            console.log(err);
        })
    };




}



