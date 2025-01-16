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
Cookie[] cookies = (Cookie[]) session.getAttribute("cookies");
%>
	<p><% for(Cookie cookie : cookies){
		
			out.print(cookies.getNombre());
		}%>
	
	</p>
</body>
</html>