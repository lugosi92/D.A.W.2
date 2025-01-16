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
	


		//Constructor
		String nombreCookie = "Khalid";
		String contenidoCookie = "22";

		//Instanciamos y creamos
		Cookie laCookie = new Cookie(nombreCookie, contenidoCookie);
		Cookie cookie2 = new Cookie("Jesus", "22");
	
		laCookie.setSecure(true);
		
		response.addCookie(laCookie);
		response.addCookie(cookie2);
		
	}
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
