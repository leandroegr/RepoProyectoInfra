const CATEGORIES_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/category/all.json";
const PUBLISH_PRODUCT_URL = "https://japdevdep.github.io/ecommerce-api/product/publish.json";
const CATEGORY_INFO_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/category/1234.json";
const PRODUCTS_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/product/all.json";
const PRODUCT_INFO_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/product/5678.json";
const PRODUCT_INFO_COMMENTS_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/product/5678-comments.json";
const CART_INFO_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/cart/987.json";
const CART_BUY_URL = "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/cart/buy.json";
const CART_INFO= "https://almacenamientorecursosweb.s3.amazonaws.com/ecommerce-api-master/cart/654.json";
var userName = localStorage.getItem('user');

// Función que limpia el sessionStorage que almacena el nombre de usuario.
function clearSession() {
  localStorage.clear();
  userName=undefined;
}
//Función que muestra barra de navegación en base a, si se inició sesión o no.
function viewNav() {
  let userName=localStorage.getItem('user');
  if (userName==undefined) {
    let navbarCont = ` <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a href="main.html" style="margin-right: 25%"><img src="img/icon.png" width="40" height="40" alt="Error!"><a/>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <button onclick="location.href='main.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="main.html" style="decoration:none; color:white;">Inicio</a> <span class="sr-only">(current)</span></button>
        <button onclick="location.href='categories.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="categories.html" style="decoration:none; color:white;">Categorías</a> <span class="sr-only">(current)</span></button>
        <button onclick="location.href='products.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="products.html" style="decoration:none; color:white;">Productos</a> <span class="sr-only">(current)</span></button>
        <button onclick="location.href='sell.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="sell.html" style="decoration:none; color:white;">Vender</a> <span class="sr-only">(current)</span></button>
        <button onclick="location.href='cart.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="cart.html" style="decoration:none; color:white;">Carrito</a> <span class="sr-only">(current)</span></button>
        <button onclick="location.href='index.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="index.html" style="decoration:none; color:white;">Iniciar Sesión</a> <span class="sr-only">(current)</span></button>
      
      </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    </div>
  </nav> 
      `
      document.body.innerHTML += navbarCont ;
  } else {
  
  let navbarCont = ` <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a href="main.html" style="margin-right: 25%"><img src="img/icon.png" width="40" height="40" alt="Error!"><a/>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <button onclick="location.href='main.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="main.html" style="decoration:none; color:white;">Inicio</a> <span class="sr-only">(current)</span></button>
      <button onclick="location.href='categories.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="categories.html" style="decoration:none; color:white;">Categorías</a> <span class="sr-only">(current)</span></button>
      <button onclick="location.href='products.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="products.html" style="decoration:none; color:white;">Productos</a> <span class="sr-only">(current)</span></button>
      <button onclick="location.href='sell.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="sell.html" style="decoration:none; color:white;">Vender</a> <span class="sr-only">(current)</span></button>
      <button onclick="location.href='cart.html' " class="btn btn-outline-secondary my-2 my-sm-0"><a href="cart.html" style="decoration:none; color:white;">Carrito</a> <span class="sr-only">(current)</span></button>
      
      <div class="dropdown mr-sm-2">
        <button class="btn btn-outline-info my-2 my-sm-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ` + userName + `</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="my-profile.html">Mi perfil</a>
          <a class="dropdown-item" onclick = "clearSession()" href="index.html">Cerrar sesión</a>
        </div>
      </div>
    </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  </div>
</nav> `
  document.body.innerHTML += navbarCont ; }
}

var showSpinner = function(){
  document.getElementById("spinner-wrapper").style.display = "block";
}

var hideSpinner = function(){
  document.getElementById("spinner-wrapper").style.display = "none";
}

var getJSONData = function(url){
    var result = {};
    showSpinner();
    return fetch(url)
    .then(response => {
      if (response.ok) {
        return response.json();
      }else{
        throw Error(response.statusText);
      }
    })
    .then(function(response) {
          result.status = 'ok';
          result.data = response;
          hideSpinner();
          return result;
    })
    .catch(function(error) {
        result.status = 'error';
        result.data = error;
        hideSpinner();
        return result;
    });
}

//Función que se ejecuta una vez que se haya lanzado el evento de
//que el documento se encuentra cargado, es decir, se encuentran todos los
//elementos HTML presentes.
viewNav();
document.addEventListener("DOMContentLoaded", function(e){
  
  
});
