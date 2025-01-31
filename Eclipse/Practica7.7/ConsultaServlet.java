package paquete;

import jakarta.servlet.ServletConfig;
import jakarta.servlet.ServletContext;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;

/**
 * Servlet implementation class ConsultaServlet
 */
@WebServlet("/ConsultaServlet")
public class ConsultaServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
   
    public ConsultaServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

    String userName;
    String password;
    String url;
	public void init(ServletConfig config) throws ServletException {
		super.init(config);
		
		//SERVLET CONFIG
		// Lectura de los par´ametros de inicializaci´on del Servlet
		//userName=config.getInitParameter("usuario");
		//password=config.getInitParameter("password");
		//url=config.getInitParameter("URLBaseDeDatos");
		
			
		
		
		//SERVLET CONTEXT
		// Se leen los parametros de inicializacion de Servlet y
		// se convierten en atributos del contexto para compartirlos con
		// cualquier servlet y JSP de la aplicaci´on
		ServletContext context = config.getServletContext();
		context.setAttribute("URLBaseDeDatos", config.getInitParameter("URLBaseDeDatos"));
		context.setAttribute("usuario", config.getInitParameter("usuario"));
		context.setAttribute("password", config.getInitParameter("password"));
		// Se recuperan las variables de contexto de la aplicaci´on
		userName=(String)context.getAttribute("usuario");
		password=(String)context.getAttribute("password");
		url=(String)context.getAttribute("URLBaseDeDatos");
		System.out.println(userName);	
		System.out.println(password);	
		System.out.println(url);
	
	}

    
    
    
    
    
    
    
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}



}
