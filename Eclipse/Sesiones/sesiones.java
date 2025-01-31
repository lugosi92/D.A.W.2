package sesiones;

import jakarta.servlet.ServletException;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

/**
 * Servlet implementation class crearCooki
 */
@WebServlet("/sesiones")
public class sesiones extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public sesiones() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		
		//Invalidar session existente si existe alguna
		if(request.getSession(false) != null) {
			request.getSession().invalidate();
		}
		
		
		//RESETEAR - CREAR
		HttpSession laSesion = request.getSession();
		
	
		laSesion.setAttribute("entero", 123);
		laSesion.setAttribute("real", 45.68);
		laSesion.setAttribute("texto", "Hola");
		laSesion.setAttribute("fecha", "12-10-2024");
	
		Map<String, Boolean> semaforo = new HashMap<>();
		semaforo.put("Verde", true);
		semaforo.put("Amarrillo", true);
		semaforo.put("Rojo", false);
		laSesion.setAttribute("semaforo", semaforo);
		
		Punto punto1 = new Punto(3,6);
		laSesion.setAttribute("Punto", punto1);
		
		laSesion.getAttributeNames();
		
		response.sendRedirect("recuperarSesion");
	
	}

}
