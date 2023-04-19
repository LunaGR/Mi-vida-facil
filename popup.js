
//Esta función carga la url guardad en la cookie anteriormente. Para que sea así se usa el href, si no, no entenderá la orden

function cargar(){
    window.location.href=document.cookie.split("=")[1];
}

