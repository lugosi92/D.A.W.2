package com.ejemplo;

import java.io.IOException;
import javax.servlet.Filter;
import javax.servlet.FilterChain;
import javax.servlet.FilterConfig;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.annotation.WebFilter;

@WebFilter("/MiServlet")
public class MiFiltro implements Filter {
    
    public void init(FilterConfig filterConfig) throws ServletException {
        System.out.println("MiFiltro inicializado.");
    }

    public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain) throws IOException, ServletException {
        System.out.println("Filtro antes del servlet.");
        chain.doFilter(request, response);
        System.out.println("Filtro después del servlet.");
    }

    public void destroy() {
        System.out.println("MiFiltro destruido.");
    }
}
