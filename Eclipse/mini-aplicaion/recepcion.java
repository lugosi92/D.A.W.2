package servidor;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;

/**
 * Servlet implementation class recepcion
 */
@WebServlet("/recepcion")
public class recepcion extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public recepcion() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
		String nombre = request.getParameter("usuario");
		String clave = request.getParameter("clave");
		
		String error = " ";
		String errorGeneral = "false";
		
		if(nombre == null || nombre.isEmpty()) {
			error += "Introduzca un nombre valido<br>";
			errorGeneral = "true";
		}
		
		if(clave == null || clave.isEmpty()) {
			error += "Introduzca una clave valido";
			errorGeneral = "true";
		}
		

		
		request.getSession().setAttribute("error", error);
		request.getSession().setAttribute("errorGeneral", errorGeneral);
		
		request.getSession().setAttribute("usuario", nombre);
		request.getSession().setAttribute("clave", clave);
		
		response.sendRedirect("index.jsp");
	}

}
