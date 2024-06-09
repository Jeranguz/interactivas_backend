<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-200">
    @yield('content')
    <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                
                let image = document.getElementById('image');
                
                if(image != null){
                    image.addEventListener("change", function(){
                        console.log("change");
                        let fileName = this.value.toLowerCase();
                        if(!fileName.endsWith('.jpg') && !fileName.endsWith('.png')){
                            alert('Please upload JPG or PNG file only.');
                            this.value = '';
                            return false;
                        }else{
                            let reader = new FileReader();
                            reader.onload = (e) => { 
                                let preview = document.getElementById('preview');
                                preview.setAttribute("src", e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]); 
                        }
                        
                    });
                }
                
            });
        </script>
</body>
</html>