async function actuallike(element) {
    try {
        const response = fetch("/actuallikes/"+element.getAttribute("data-id"))
                               .then(function (response) { 
                                   if (!response.ok) throw response.status;
                                   return response.json();
                                })
                               .then(function (responseJSON) {
                                    element.setAttribute("data-likes", ` ${responseJSON.numero}`);
                                    if(responseJSON.like == true){
                                        element.classList.toggle("fa-heart");
                                    }else{
                                        element.classList.toggle("fa-heart-o");
                                    }
                                    document.getElementById(element.getAttribute("id")).innerHTML=`${responseJSON.numero}`
                               });
    } catch(error) {
        console.log(error);
    }
}