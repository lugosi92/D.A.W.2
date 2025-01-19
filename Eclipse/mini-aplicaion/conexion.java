package servidor;

import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 * Servlet implementation class conexion2
 */
@WebServlet("/conexion2")
public class conexion2 extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	
	/*https://www.youtube.com/watch?v=36cQjEEvK30
	 * 1 Crear el metodo de conexion (jdbc)
	 * 2 Crear el obejto conexion 
	 * (Eclipse sugiere 2 try-catch para clase y conexion)
	 * 3 Obtenemos los parametro desde donde nacen
	 * 4 Creamos una sentencia prepradas
	 * 5 Resultado
	 * 6 Preparar fallos de conexion
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		try {
			//1
			Class.forName("com.mysql.cj.jdbc.Drive");
		} catch (ClassNotFoundException e) {
			try {
				//6
				PrintWriter out = response.setWrite(;)
				//2
				Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/usuarios", "root","1234");
				//3
				String nombre = request.getParameter("usuario");
				String clave = request.getParameter("clave");
				//4
				PreparedStatement consulta1 = conexion.prepareStatement("Select usuario from usuario WHERE usuario = ? AND contraseña = ?");
			
				consulta1.setString(1, nombre);
				consulta1.setString(1, clave);
				ResultSet resultado = consulta1.executeQuery();
				
				//5
				if(resultado.next()) {
					RequestDispatcher rd = request.getRequestDispatcher("welcome.jsp");
					rd.forward(request, response);
				}else {
					out.println("<font color = red>Login Failed!!<br>");
					out.println("<a href=index.jsp>Try AGAIN!");
				}
				
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			e.printStackTrace();
		}
	}

}
