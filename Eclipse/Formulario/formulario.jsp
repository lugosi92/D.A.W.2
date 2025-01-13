<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

 <!-- FORMULARIO -->
<h1>Formulario Simple</h1>
    <form action="procesar" method="post">
        <label for="nombre">Nombre:</label>
        <input 
        type="text" id="nombre" name="nombre">

        <br><br>
        <label for="edad">Edad:</label>
        <input 
        type="text" id="edad" name="edad">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    
    

<!-- PROCESAR -->
   <% 
    String nombre = (String) session.getAttribute("nombre");
    String edad = (String) session.getAttribute("edad");

    if (nombre != null && edad != null) {
%>

    <p style = "color: blue">Nombre: <%= nombre %></p>
    <p style = "color: blue">Edad: <%= edad %></p>
<% 
    } else {
%>
    <p style = "color: red">No hay datos</p>
<% 
    }
%>
</body>
</html>