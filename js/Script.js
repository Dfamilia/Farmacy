$(document).ready(function () {
    loadDoc();
    ocultar();
    /*------- Abrir y cerrar formulario */
    //Btn cerrar
    ~$("#cerrar_form").click(function (e) { 
        ocultar();
    });
    //btn Abrir
    $("#agregar_user").click(function (e) {
        $("h2").html("Nuevo usuario");
        id_user=-1;
        valor_form("","","");
        $(".sombra_ventana_emergente").show();        
    });
    //Btn Cerrar
    $("#form_btn_guardar").click(function (e) {
        let u=document.forms["form-user"]["user"].value, c=document.forms["form-user"]["pass"].value,a= document.forms["form-user"]["rol"].value;
      if (u!="" && c!="" && a!="" ){
          if (id_user===-1){
                agregar_user();
                loadDoc();
                ocultar();
          }else{
            guardar_edicion();
            loadDoc();
          }
       } else{
           alert("Debe llenar los campos para poder guardar los datos");
       }
    });
    $(document.forms["form-user"]["pass"]).focus(function (e) { 
        document.forms["form-user"]["pass"].type='Text';
    });
    $(document.forms["form-user"]["pass"]).blur(function (e) { 
        document.forms["form-user"]["pass"].type='password';
    });
});

function ocultar(){
    $(".sombra_ventana_emergente").hide();
};

//Cargar y actualizar datos
let global_json;
function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        myFunction(this.responseText);
    }
    xhttp.open('GET', 'cargar_tabla.php',true);
    xhttp.send();
  }
  function myFunction(string) {
    global_json=JSON.parse(string);
    let json= JSON.parse(string);
    var cont=0;
    let table=`<thead>
    <tr>
    <th scope='col' onclick=w3.sortHTML('#table','.item','td:nth-child(1)') style=cursor:pointer>#</th>
    <th scope='col' onclick=w3.sortHTML('#table','.item','td:nth-child(2)') style=cursor:pointer>Nombre de usuario</th>
    <th scope='col' onclick=w3.sortHTML('#table','.item','td:nth-child(3)') style=cursor:pointer>Rol</th>
    <th scope='col'>Ajustar</th>
    </tr>
    </thead><tbody>`;
    json.forEach(i => {
        cont+=1;
        table +=`<tr class=item>
        <td scope="row"> ${i.id_user}</td>
        <td scope="row">${i.name_user}</td>
        <td scope="row">${i.rol}</td>
        <td scope="row"><button class="btn_editar btn btn-primary" type="button" id="${i.id_user}" onclick=mostar_datos_form(this)>Editar</button>
        <button class="btn_Eliminar btn btn-danger" type="button" id="${i.id_user}" onclick=eliminar_user(this)>Eliminar</button></td>
        </tr>`;
    });
    table +=`</tbody>
    </table>`;
    $("#table").html(table);
  }

//guardar usuario editado
function guardar_edicion(){
    var val= JSON.parse(obtener_valor_form());
    var user="";
    global_json.forEach(i => {
        if (i.id_user===id_user){
            user =  {id_user:id_user};
            if(i.name_user != val.name_user){
                user.name_user=val.name_user;
            }
            if(i.pass != val.pass){
                user.pass= val.pass;
            }
            if(i.rol != val.rol){
                user.rol= val.rol;
            } 
        }
    });
    enviar(JSON.stringify(user),"actualizar_usuario.php");
    ocultar();
}
//Sirve para dentificar si se está agregando o eliminando un usuario
var id_user;
//Mostrar los datos que se editaran al formulario.
function mostar_datos_form(obj){
    $("h2").html("Editar usuario");
    global_json.forEach(i => {
        if (i.id_user===obj.id){
            id_user=i.id_user;
            valor_form(i.name_user,i.pass,i.rol);
        }
    });
    $(".sombra_ventana_emergente").show();
}

//Obtener valores del formulario
function obtener_valor_form(){
/*     var combo = document.forms['form-user']['rol'];
    var selected = combo.options[combo.selectedIndex].text; */

    let user = {name_user: document.forms["form-user"]["user"].value, 
    pass:document.forms["form-user"]["pass"].value,
    rol:document.forms["form-user"]["rol"].value };
    return JSON.stringify(user);
}

//cambiar valores al formulario
function valor_form(u,c,a){
    document.forms["form-user"]["user"].value=u;
    document.forms["form-user"]["pass"].value=c;
    document.forms["form-user"]["rol"].value=a;
}
//Eliminar usuario
function eliminar_user(obj){
    enviar(obj.id,"eliminar_usuario.php");
}

//Agregar usuario
function agregar_user(){
    enviar(obtener_valor_form(),"agregar_user.php");
}
//Enviar valor a la base de datos
function enviar(valor, url){
    $.ajax({
        type: "POST",
        url: url,
        data: { valor },
        success: function (response) {
            $respuesta=response;
            alert($respuesta);
            loadDoc();
        }
    });
}