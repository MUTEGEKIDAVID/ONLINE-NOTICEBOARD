window.onload()= pageload;
             
             function pageload(){
                document.getElementsByName("body").onchange = changesize;
             }

             
            function changesize() {
                let size = document.getElementById("Size").value;
	            document.getElementsByName("input").style.fontSize = size;
            }