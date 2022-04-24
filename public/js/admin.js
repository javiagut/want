function cambiarColor(id){
    var button = document.querySelectorAll('button');

    if(id==button.length-2){
        button[button.length-2].style.color='white';
        button[button.length-2].style.backgroundColor='#5baa9a';
        button[button.length-1].style.color='#5baa9a';
        button[button.length-1].style.backgroundColor='white';
    }
    else if(id==0){
        button[button.length-1].style.color='#5baa9a';
        button[button.length-1].style.backgroundColor='white';
        button[button.length-2].style.color='#5baa9a';
        button[button.length-2].style.backgroundColor='white';
    }
    else{
        button[button.length-1].style.color='white';
        button[button.length-1].style.backgroundColor='#5baa9a';
        button[button.length-2].style.color='#5baa9a';
        button[button.length-2].style.backgroundColor='white';
    }
}

function mostrarAñadirCategoria(){
    var form = document.getElementById('form_nueva_categoria');
    if(form.style.display != 'flex'){
        form.style.display = 'flex';
        var button = document.querySelectorAll('button');
        cambiarColor(button.length-2);
        ocultarModificarCategoria();
        var aviso = document.getElementById('avisoCategorias');
        aviso.style.display = 'none';
    }
    else{
        form.style.display = 'none';
        var aviso = document.getElementById('avisoCategorias');
        aviso.style.display = 'flex';
        var button = document.querySelectorAll('button');
        cambiarColor(0);
    }
}
function ocultarAñadirCategoria(){
    var form = document.getElementById('form_nueva_categoria');
    form.style.display = 'none';
}
function mostrarModificarCategoria(){
    var form = document.getElementById('form_modificar_categoria');
    if(form.style.display != 'flex'){
        form.style.display = 'flex';
        var button = document.querySelectorAll('button');
        cambiarColor(button.length-1);
        ocultarAñadirCategoria();
        var aviso = document.getElementById('avisoCategorias');
        aviso.style.display = 'none';
    }
    else{
        form.style.display = 'none';
        var aviso = document.getElementById('avisoCategorias');
        aviso.style.display = 'flex';
        var button = document.querySelectorAll('button');
        cambiarColor(0);
    }
}
function ocultarModificarCategoria(){
    var form = document.getElementById('form_modificar_categoria');
    form.style.display = 'none';
}

function mostrarHijos(id){
    var div = document.querySelectorAll('div');
    div.forEach(categoria => {
        var clases = categoria.classList;
        if(categoria.id==id){
            if(categoria.style.display == 'block'){
                categoria.style.display = 'none';
            }
            else{
                categoria.style.display = 'block';
            }
        }
        if(clases[2]==id){
            categoria.style.display = 'none';
        }
    });
}
function mostrarTodas(){
    var totalCategorias=0;
    var visibles=0;
    var div = document.querySelectorAll('div');
    div.forEach(categoria => {
        var clases = categoria.classList;
        if(clases[clases.length-1]=='cat'){
            totalCategorias++;
            if(categoria.style.display=='block'){
                visibles++;
            }
        }
    });
    if(totalCategorias==visibles){
        div.forEach(categoria => {
            var clases = categoria.classList;
            if(clases[clases.length-1]=='cat'){
                categoria.style.display = 'none';
            }
        });
    }
    else{
        div.forEach(categoria => {
            var clases = categoria.classList;
            if(clases[clases.length-1]=='cat'){
                categoria.style.display = 'block';
            }
        });
    }
}

function mostrarAñadirProducto(){
    var button = document.querySelectorAll('button');
    var divAñadir = document.getElementById('mostrarAñadirProducto');
    var divEditar = document.getElementById('mostrarEditarProducto');

    if (divAñadir.style.display != 'block') {
        divAñadir.style.display = 'block';
        button[0].style.backgroundColor = '#5baa9a';
        button[0].style.color = 'white';

        divEditar.style.display = 'none';
        button[1].style.backgroundColor = 'white';
        button[1].style.color = 'black';

    }
    else{
        divAñadir.style.display = 'none';
        button[0].style.backgroundColor = 'white';
        button[0].style.color = 'black';

    }
}
function mostrarEditarProducto(){
    var button = document.querySelectorAll('button');
    var divEditar = document.getElementById('mostrarEditarProducto');
    var divAñadir = document.getElementById('mostrarAñadirProducto');

    if (divEditar.style.display != 'block') {
        divEditar.style.display = 'block';
        button[1].style.backgroundColor = '#5baa9a';
        button[1].style.color = 'white';

        divAñadir.style.display = 'none';
        button[0].style.backgroundColor = 'white';
        button[0].style.color = 'black';

    }
    else{
        divEditar.style.display = 'none';
        button[1].style.backgroundColor = 'white';
        button[1].style.color = 'black';

    }
}

function rebaja(){
    var rebaja2 = document.getElementsByClassName('rebajaActivada');
    if(this.name == ''){
        var inicio=0;
        var ini = 0;
        var fin = 3;
    }
    else{
        var inicio=3;
        var ini = 3;
        var fin = 6;
    }

    if(rebaja2[ini].style.display == 'revert'){
        for (ini = ini; ini < fin; ini++) {
            rebaja2[ini].style.display = 'none';
        }
        if(inicio==3){
            var form = document.getElementById('editarProductoFormulario');
            form.rebaja.value = null;
            form.rebaja_inicio.value = null;
            form.rebaja_fin.value = null;
        }
        else{
            var form = document.getElementById('añadirProductoFormulario');
            form.rebaja.value = null;
            form.rebaja_inicio.value = null;
            form.rebaja_fin.value = null;
        }
    }
    else{
        for (ini = ini; ini < fin; ini++) {
            rebaja2[ini].style.display = 'revert';
        }
    }
}

function mostrarListaProductos(){
    limpiarPorductosColor();
    limpiarFormularioEditarProductos();
    var listas = document.getElementsByClassName('listaProductos');
    var categorias = document.getElementsByClassName('catProBTN');
    var cont = 0;
    if (this.innerHTML != 'Todos'){
        for (let i = 0; i < listas.length; i++) {
            if (listas[i].id == this.innerHTML) {
                if(categorias[i].style.backgroundColor != 'rgb(91, 170, 154)'){
                    var h3 = listas[i].getElementsByTagName('h3');
                    h3[0].style.display = 'block';
                    listas[i].style.display = 'block';
                    categorias[i].style.backgroundColor = '#5baa9a';
                    categorias[i].style.color = 'white';
                }
                else{
                    categorias[i].style.backgroundColor = 'white';
                    categorias[i].style.color = 'black';
                    for (let e = 0; e < listas.length; e++){
                        var h3 = listas[e].getElementsByTagName('h3');
                        h3[0].style.display = 'block';
                        listas[e].style.display = 'none';
                    }
                    cont=0;
                }
            }
            else{
                if (listas[i].style.display == 'block') {
                    listas[i].style.display = 'none';
                    categorias[i].style.backgroundColor = 'white';
                    categorias[i].style.color = 'black';
                }
            }
            if (listas[i].style.display == 'block') cont++ ;
        }
        categorias[categorias.length-1].style.backgroundColor = 'white';
        categorias[categorias.length-1].style.color = 'black';
    }
    else{
        for (let i = 0; i < categorias.length-1; i++){
            listas[i].style.display = 'none';
            categorias[i].style.backgroundColor = 'white';
            categorias[i].style.color = 'black';
        }
        if(categorias[categorias.length-1].style.backgroundColor != 'rgb(91, 170, 154)'){
            categorias[categorias.length-1].style.backgroundColor = '#5baa9a';
            categorias[categorias.length-1].style.color = 'white';

            for (let i = 0; i < listas.length; i++){
                var buttons = listas[i].querySelectorAll('button');
                if(buttons.length>0){
                    listas[i].style.display = 'block';
                    var h3 = listas[i].getElementsByTagName('h3');
                    h3[0].style.display = 'none';
                }
            }

        }
        else{
            categorias[categorias.length-1].style.backgroundColor = 'white';
            categorias[categorias.length-1].style.color = 'black';
            for (let i = 0; i < listas.length; i++){
                var buttons = listas[i].querySelectorAll('button');
                if(buttons.length>0){
                    listas[i].style.display = 'none';
                    var h3 = listas[i].getElementsByTagName('h3');
                    h3[0].style.display = 'block';
                }
            }
        }
    }

    for (let i = 0; i < categorias.length-1; i++){
        if (listas[i].style.display != 'none') cont++ ;
    }
    if(cont>0){
        document.getElementById('formularioProductoSeleccionado').style.display =  'flex';
        document.getElementById('eliminarProducto').style.display = 'block';

    }
    else {
        document.getElementById('formularioProductoSeleccionado').style.display =  'none';
        document.getElementById('eliminarProducto').style.display = 'none';
    }
}
function limpiarFormularioEditarProductos(){
    var eliminar = document.getElementById('eliminarProducto');
    eliminar.id.value = '';
    var form = document.getElementById('editarProductoFormulario');
    form.id.value = '';
    form.nombre.value = '';
    form.categoria.value = '';
    form.estado.value = '';
    form.check.checked = false;
    var rebaja = document.getElementsByClassName('rebajaActivada');
    rebaja[3].style.display = 'none';
    rebaja[4].style.display = 'none';
    rebaja[5].style.display = 'none';
    document.getElementById('eliminarProducto').id.value = '';
    document.getElementById('eliminarProducto').style.display = 'none';
}

function rellenarFormularioEditarProductos(id,nombre,categoria,rebaja,rebaja_inicio,rebaja_fin,estado){

    var eliminar = document.getElementById('eliminarProducto');
    eliminar.id.value = id;
    var form = document.getElementById('editarProductoFormulario');
    form.id.value = id;
    form.nombre.value = nombre;
    form.categoria.value = categoria;
    form.estado.value = estado;
    var rebaja2 = document.getElementsByClassName('rebajaActivada');
    if(rebaja != '' ){
        form.check.checked = true ;
        rebaja2[3].style.display = 'revert';
        rebaja2[4].style.display = 'revert';
        rebaja2[5].style.display = 'revert';

        form.rebaja.value = rebaja;
        form.rebaja_inicio.value = rebaja_inicio;
        form.rebaja_fin.value = rebaja_fin;
    }
    else{
        form.check.checked = false ;
        rebaja2[3].style.display = 'none';
        rebaja2[4].style.display = 'none';
        rebaja2[5].style.display = 'none';
    }

}

function ocultarStock(){
    var tables = document.getElementsByClassName('titleStock');
    for (var i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none';
    }
    var ed = document.getElementsByClassName('editarStockFormulario');
    for (var i = 0; i < ed.length; i++) {
        ed[i].style.display = 'none';
    }
}

function mostrarProductosStock(){
    limpiarPorductosColor();
    ocultarStock();
    var listas = document.getElementsByClassName('listaProductos');
    var categorias = document.getElementsByClassName('catProBTN');
    var cont = 0;
    for (let i = 0; i < listas.length; i++) {
        if (listas[i].style.display == 'block') {
            listas[i].style.display = 'none';
            categorias[i].style.backgroundColor = '';
            categorias[i].style.color = '';
        }
        else{
            if (listas[i].id == this.innerHTML) {
                listas[i].style.display = 'block';
                categorias[i].style.backgroundColor = '#5baa9a';
                categorias[i].style.color = 'white';
            }
            else{
                if (listas[i].style.display == 'block') {
                    listas[i].style.display = 'none';
                    categorias[i].style.backgroundColor = '';
                    categorias[i].style.color = '';
                }
            }
        }
        if (listas[i].style.display == 'block') cont++ ;
    }
    if(cont>0){
        document.getElementById('formularioProductoSeleccionado').style.display =  'flex';

    }
    else {
        document.getElementById('formularioProductoSeleccionado').style.display =  'none';
    }
}

function mostrarStock(id){
    var formsEditar = document.getElementsByClassName('crearStockFormulario');
    var formsCrear = document.getElementsByClassName('editarStockFormulario');
    for (let i = 0; i < formsEditar.length; i++) {
        formsEditar[i].style.display = 'none';
    }
    for (let i = 0; i < formsCrear.length; i++) {
        formsCrear[i].style.display = 'none';
    }
    var stocks = document.getElementsByClassName('titleStock');
    for (let i = 0; i < stocks.length; i++) {
        if(stocks[i]!==null) {
            if(stocks[i].id == id || stocks[i].id=='nuevoStock'){
                stocks[i].style.display = 'block';
                rellenarNuevoStock(id);
            }
            else  stocks[i].style.display = 'none';
        }
    }
}
function up(inner){
    var listas = document.getElementsByClassName('listaProductos');
    for (let i = 0; i < listas.length; i++) {
        if(listas[i].style.display == 'block'){
            var buttons = listas[i].querySelectorAll('button');
            for (let e = 0; e < buttons.length; e++) {
                if(buttons[e].innerHTML==inner){
                    buttons[e].style.color = '#5baa9a';
                }
                else{
                    buttons[e].style.color = 'black';
                }
            }
        }
    }
    
}

function limpiarPorductosColor(){
    var listas = document.getElementsByClassName('listaProductos');
    for (let i = 0; i < listas.length; i++) {
        if(listas[i].style.display == 'block'){
            var buttons = listas[i].querySelectorAll('button');
            for (let e = 0; e < buttons.length; e++) {
                buttons[e].style.color = 'black';
            }
        }
    }
    
}

function rellenarNuevoStock(id){
    var nuevoStock = document.getElementById('crearStockFormulario');
    nuevoStock.id.value = id;
}
function mostrarFormularioNuevoStock(){
    var stocks = document.getElementsByClassName('editarStockFormulario');
    for (let i = 0; i < stocks.length; i++) {
        stocks[i].style.display = 'none';
    }
    var nuevoStock = document.getElementById('crearStockFormulario');
    if(nuevoStock.style.display != 'block') nuevoStock.style.display = 'block';
    else  nuevoStock.style.display = 'none';
}

function filtrarProducto(){
    var form = document.getElementById('buscador');
    var texto = form.buscadorProductos.value;
    var buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        if(button.id =='prodCatAbierta'){
            var producto = button.innerHTML.toLocaleLowerCase();
            if(!producto.includes(texto.toLocaleLowerCase())){
                button.style.display = 'none';
            }
            else button.style.display = 'flex';
        }
    });
}

function filtrarCategoria(){
    var form = document.getElementById('buscador');
    var texto = form.buscadorCategorias.value;
    var trs = document.querySelectorAll('tr');
    trs.forEach(tr => {
        if(tr.classList[0] == 'catAbierta'){
            var producto = tr.id.toLocaleLowerCase();
            if(!producto.includes(texto.toLocaleLowerCase())){
                tr.style.display = 'none';
            }
            else{
                tr.style.display = '';
            }
        }
        else{
            tr.style.display = '';
        }
    });
    console.log(texto);
}

function editarStock(id){
    var formsEditar = document.getElementsByClassName('editarStockFormulario');
    for (var i = 0; i < formsEditar.length; i++) {
        if(formsEditar[i].style.display != 'block'){
            if(formsEditar[i].id.value == id) formsEditar[i].style.display = 'block';
            else formsEditar[i].style.display = 'none';
        }
        else{
            if(formsEditar[i].id.value == id) formsEditar[i].style.display = 'none';
            else formsEditar[i].style.display = 'none';
        }
    }
    var nuevoStock = document.getElementById('crearStockFormulario');
    nuevoStock.style.display = 'none';
}

function esconder(){
    var status = document.getElementById('status');
    if(status != null) status.style.display = 'none';
}
function mostrarDetalle(id){
    var tr = document.getElementById(id);
    if(tr.style.display != '') tr.style.display = '';
    else tr.style.display = 'none';
    console.log(id);
}

function main(){
    var pagina = document.getElementById('paginaJS');
    if(pagina.innerHTML=='categorias'){
        document.title = 'want. | admin Categorias';
        var button = document.querySelectorAll('button');
        button[button.length-2].addEventListener('click',mostrarAñadirCategoria);
        button[button.length-1].addEventListener('click',mostrarModificarCategoria);
    }
    else if(pagina.innerHTML=='productos'){
        document.title = 'want. | admin Productos';
        var button = document.querySelectorAll('button');
        button[0].addEventListener('click',mostrarAñadirProducto);
        button[1].addEventListener('click',mostrarEditarProducto);
        var rebajaBTN = document.getElementsByClassName('activarRebaja');
        rebajaBTN[0].addEventListener('click',rebaja);
        rebajaBTN[1].addEventListener('click',rebaja);
        var categorias = document.getElementsByClassName('catProBTN');
        for (let i = 2; i < categorias.length+2; i++) {
            button[i].addEventListener('click',mostrarListaProductos);
        }



    }
    else if(pagina.innerHTML=='stock'){
        document.title = 'want. | admin Stock';
        var categorias = document.getElementsByClassName('catProBTN');
        for (let i = 0; i < categorias.length; i++) {
            categorias[i].addEventListener('click',mostrarProductosStock);
        }
    }
    setTimeout(esconder, 2500);
    
    
    
}

window.onload=main;