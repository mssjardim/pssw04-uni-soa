/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.service;

import br.com.lembrarws.model.entities.Usuarios;
import java.util.List;
import javax.ejb.EJB;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author Marco
 */
@WebService(serviceName = "LembrarWS")
public class LembrarWS {

    @EJB
    private LembrarBeanLocal bean;

    @WebMethod(operationName = "bean")
    public String bean(@WebParam(name = "str") String str) {
        return bean.bean(str);
    }

    @WebMethod(operationName = "findUsuariosByEmail")
    public Usuarios findUsuariosByEmail(@WebParam(name = "email") String email) {
        return bean.findUsuariosByEmail(email);
    }

    @WebMethod(operationName = "listUsuarios")
    public List<Usuarios> listUsuarios() {
        return bean.listUsuarios();
    }
}
