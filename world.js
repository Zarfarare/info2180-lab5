window.onload = function(){
    let LookUpbtn = document.querySelector("#lookup");
    
    LookUpbtn.onclick = function(){
        let country = document.querySelector("#country").value;
        let result = document.querySelector("#result");

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
    };
}
