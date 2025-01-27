package sesiones;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;

import java.io.IOException;
import java.util.Map;

/**
 * Servlet implementation class recuperarSesion
 */
@WebServlet("/recuperarSesion")
public class recuperarSesion extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public recuperarSesion() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		
		HttpSession laSesion = request.getSession();
		
		Integer entero = (Integer) laSesion.getAttribute("entero");
		Integer real = (Integer) laSesion.getAttribute("real");
		String texto = (String) laSesion.getAttribute("texto");
		String fecha = (String) laSesion.getAttribute("fecha");
		Map<String, Boolean> semaforo =(Map<String,Boolean>) laSesion.getAttribute("semaforo");
		Punto punto = (Punto) laSesion.getAttribute("punto");
		
		response.sendRedirect("/mostrar.jsp");
	}

}
