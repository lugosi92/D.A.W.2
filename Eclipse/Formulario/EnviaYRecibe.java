package Servlet;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.sql.Date;
import java.text.SimpleDateFormat;

/**
 * Servlet implementation class EnviaYRecibe
 */
@WebServlet("/EnviaYRecibe")
public class EnviaYRecibe extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public EnviaYRecibe() {
        super();
        // TODO Auto-generated constructor stub
    }
    
protected Boolean mayorDeEdad(String _fechaNac) {
        
        SimpleDateFormat formatoFecha = new SimpleDateFormat("dd/MM/yyyy");
        Date fechaHoy = new Date(0);
        String cadenaHoy = formatoFecha.format(fechaHoy);
        
        String[] dat1 = _fechaNac.split("/");
        String[] dat2 = cadenaHoy.split("/");
        int anios = Integer.parseInt(dat2[2]) - Integer.parseInt(dat1[2]);
        int mes = Integer.parseInt(dat2[1]) - Integer.parseInt(dat1[1]);
        if (mes < 0) {
            anios = anios - 1;
        } else if (mes == 0) {
            int dia = Integer.parseInt(dat2[0]) - Integer.parseInt(dat1[0]);
            if (dia > 0) {
                anios = anios - 1;
            }
        }
        
        if(anios<18)
            return false;
        else
            return true;
    }

//1. Validar parametros, si no son corrrectos mostrar arriba errores y parametros cocrrectos repinsarlos
	@SuppressWarnings("unused")
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	
		String clave = request.getParameter("clave");
		String genero = request.getParameter("genero");
		String fechaNacimiento = request.getParameter("fechaNacimiento");
		String[] pais= request.getParameterValues("pais[]");
		String acepto = request.getParameter("acepto");
		String comentario = request.getParameter("comentario");



		
		String error = " ";
		String errorGeneral = "false";

		
		//Logica de negocio
		if(nombre == null || nombre.isEmpty()){
			error += "NOMBRE -> obligatorio.<br>";
			errorGeneral = "true";
		}
		if(clave.length() <6 || clave.length() > 12) {
			error += "CONTRASEÑA -> longitud entre 6 - 12 <br>";
			errorGeneral = "true";
		}
		if(genero == null || genero.isEmpty()) {
			error += "GENERO -> Debes seleccionar algun genero <br>";
			errorGeneral = "true";
		}
		
		if(fechaNacimiento.isEmpty()) {
			error += "NACIMIENTO -> Campo obligatorio <br>";
			errorGeneral = "true";
		}else if(mayorDeEdad(fechaNacimiento) == false) {
			error += "NACIMIENTO -> Debes ser mayor de edad <br>";
			errorGeneral = "true";
		}
     
		if(pais == null) {
			error += "PAIS -> Debes seleccionar paises <br>";
			errorGeneral = "true";
		}else if(pais.length == 1) {
			error += "PAIS -> Debes seleccionar mas de 1 pais <br>";
			errorGeneral = "true";
		}
		
		if(acepto == null) {
			error += "Aceptar -> Debes aceptar <br>";
			errorGeneral = "true";
		}
		
		if(comentario == null || comentario.isEmpty()) {
			error += "COMENTARIO -> Debes agregar un comentario <br>";
			errorGeneral = "true";
		}
		
		
            request.getSession().setAttribute("nombre", nombre);
            request.getSession().setAttribute("clave", clave);
            request.getSession().setAttribute("genero", genero);
            request.getSession().setAttribute("fechaNacimiento", fechaNacimiento);
            request.getSession().setAttribute("pais", pais);
            request.getSession().setAttribute("acepto", acepto);
            request.getSession().setAttribute("comentario", comentario);

            request.getSession().setAttribute("error", error);
            request.getSession().setAttribute("errorGeneral", errorGeneral);
            
            response.sendRedirect("formulario.jsp");
        }
	}