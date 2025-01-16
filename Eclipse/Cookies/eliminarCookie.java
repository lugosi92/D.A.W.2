package GeneraCookie;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;

/**
 * Servlet implementation class GeneraCookie
 */
@WebServlet("/GeneraCookie")
public class GeneraCookie extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
   
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	
	try {
		//Eliminar la cookie del cliente
		
		Cookie laCookie = new Cookie("Ivan", "");
		laCookie.setMaxAge(3);
		laCookie.setSecure(true);
		laCookie.isHttpOnly();
		response.addCookie(laCookie);
		
	}catch(Exception e) {
		e.printStackTrace(System.out);
	}
	
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
