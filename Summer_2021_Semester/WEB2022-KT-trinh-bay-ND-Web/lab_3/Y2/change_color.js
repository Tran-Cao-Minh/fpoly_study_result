document.getElementById("change-color").addEventListener("change",function(){
    document.documentElement.style.setProperty("--purple", 
                                                document.getElementById("change-color").value);
});