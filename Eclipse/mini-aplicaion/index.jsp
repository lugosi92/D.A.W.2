<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

<%
	String nombre = (String) session.getAttribute("usuario");
	String clave = (String) session.getAttribute("clave");
	
	String error = (String) session.getAttribute("error");
	String errorGeneral = (String) session.getAttribute("errorGeneral");
%>	
	
<%if(errorGeneral == "true" ||  errorGeneral == null){%>

<p style="color: red"><%= error %></p>


<form action = "recepcion" method = "post">
	
	<label for="usuario">Usuario:</label>
	<input type="text" name="usuario">
	
	<br>
	<label for="clave">Contraseña:</label>
	<input type="text" name="clave">
	
	<br>
	<button type="submit">Enviar</button>
	
	
	<%}else{%>
	
	<p style="color: blue">Nombre: <%=nombre %></p>
	<p style="color: blue">Clave:<%=clave %></p>
	
	
	<%}%>
	</form>
</body>
</html>