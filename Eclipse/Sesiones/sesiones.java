package sesiones;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;

import java.io.IOException;

/**
 * Servlet implementation class crearCooki
 */
@WebServlet("/crearCooki")
public class crearCooki extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public crearCooki() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		
		// Se crea/recupera una sesión.
		if(request.getSession(false) != null) {
			request.getSession().invalidate();
		}
		
		//RESETEAR
		HttpSession laSesion = request.getSession();
		
		laSesion.setAttribute("entero", 123);
		laSesion.setAttribute("real", 45.68);
		laSesion.setAttribute("texto", "Hola");
		laSesion.setAttribute("fecha", "12-10-2024");
		
		laSesion.getAttributeNames();
	
	}

}
