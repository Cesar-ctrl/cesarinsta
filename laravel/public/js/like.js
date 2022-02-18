async function alterna_like(element) {
    try {
        const response = await fetch("/dolike/"+element.getAttribute("data-id"))
                               .then(function (response) { 
                                   if (!response.ok) throw response.status;
                                   return response.json();
                                })
                               .then(function (responseJSON) {
                                    element.setAttribute("data-likes", ` ${responseJSON.numero}`);
                                    element.classList.toggle("fa-heart");
                                    element.classList.toggle("fa-heart-o");
                                    document.getElementById(element.getAttribute("id")).innerHTML=`${responseJSON.numero}`
                               });
    } catch(error) {
        console.log(error);
    }
    
    
}