<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<h1>Bienvendio <bold>aprendiz</bold></h1>
<form action="crearCookie.jsp" method="post">

    <input type="radio" name="aprendiz" value="Alfarero" id="Alfarero">
    <label for="Alfarero">Alfarero</label>
    
    <input type="radio" name="aprendiz" value="Brujo" id="Brujo">
    <label for="Brujo">Brujo</label>
    
    <input type="radio" name="aprendiz" value="Curtidor" id="Curtidor">
    <label for="Curtidor">Curtidor</label>
    
    <input type="submit" value="Desconectar">
</form>

</body>
</html>