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
		//Constructor
		String nombreCookie = "Khalid";
		String contenidoCookie = "22";

		//Instanciamos y creamos
		Cookie laCookie = new Cookie(nombreCookie, contenidoCookie);
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
