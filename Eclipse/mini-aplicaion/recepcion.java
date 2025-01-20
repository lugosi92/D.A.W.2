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
		
		/*
		 Para la contraseña:
    		• Debe introducir al menos 12 caracteres.
    		• Sólo puede introducir 20 caracteres.
    		• Debe introducir al menos 1 letra mayúscula.
    		• Debe introducir al menos 1 letra minúscula.
    		• Debe introducir al menos 1 carácter especial.
    		• Se permiten los siguientes caracteres especiales -_/()$%&?!+*#<>=
    		• Debe introducir al menos 1 carácter numérico
		 */
		String nombre = request.getParameter("usuario");
		String clave = request.getParameter("clave");
		
		String error = " ";
		String errorGeneral = "false";
		
		//NOMBRES
		if(nombre.length() < 6 || nombre.length() > 30) {
			error += "Usuario incorrecto (1)<br>";
			errorGeneral = "true";
		}
		if(nombre.isEmpty()) {
			error += "Usuario incorrecto (2)<br>";
			errorGeneral = "true";
		}
		if(nombre.contains(" ")) {
			error += "Usuario incorrecto (3)<br>";
			errorGeneral = "true";
		}
		
		if(!nombre.matches("[A-Za-z0-9-_]+")) {
			error += "Usuario incorrecto (4)<br>";
			errorGeneral = "true";
		}
		
		//CONTRASEÑAS
		if(clave.length() < 12 || clave.length() > 20) {
			error += "Introduzca una clave valida(1)<br>";
			errorGeneral = "true";
		}
		
		if (!clave.matches(".*[A-Z].*")) {
		    error += "Introduzca una clave valida(2)<br>";
		    errorGeneral = "true";
		}

		if (!clave.matches(".*[a-z].*")) {
		    error += "Introduzca una clave valida(3)<br>";
		    errorGeneral = "true";
		}

		if (!clave.matches(".*[0-9].*")) {
		    error += "Introduzca una clave valida(4)<br>";
		    errorGeneral = "true";
		}

		if (!clave.matches(".*[-_/()$%&?!+*#<>=].*")) {
		    error += "Introduzca una clave valida(5)<br>";
		    errorGeneral = "true";
		}



		
		request.getSession().setAttribute("error", error);
		request.getSession().setAttribute("errorGeneral", errorGeneral);
		
		request.getSession().setAttribute("usuario", nombre);
		request.getSession().setAttribute("clave", clave);
		
		response.sendRedirect("index.jsp");
	}

}
