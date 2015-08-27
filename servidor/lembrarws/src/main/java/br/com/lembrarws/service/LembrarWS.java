/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.service;

import br.com.lembrarws.model.entities.Lembretes;
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

    @WebMethod(operationName = "teste")
    public String teste(@WebParam(name = "texto") String texto) {
        return bean.teste(texto);
    }

    @WebMethod(operationName = "findUsuariosByEmail")
    public Usuarios findUsuariosByEmail(@WebParam(name = "email") String email) {
        return bean.findUsuariosByEmail(email);
    }

    @WebMethod(operationName = "listUsuarios")
    public List<Usuarios> listUsuarios() {
        return bean.listUsuarios();
    }

    @WebMethod(operationName = "createUsuario")
    public boolean createUsuario(@WebParam(name = "usuario") Usuarios usuario) {
        return bean.createUsuario(usuario);
    }

    @WebMethod(operationName = "editUsuario")
    public boolean editUsuario(@WebParam(name = "usuario") Usuarios usuario) {
        return bean.editUsuario(usuario);
    }

    @WebMethod(operationName = "listLembretesByIdusuario")
    public List<Lembretes> listLembretesByIdusuario(@WebParam(name = "idusuario") int idusuario) {
        return bean.listLembretesByIdusuario(idusuario);
    }

    @WebMethod(operationName = "createLembrete")
    public boolean createLembrete(@WebParam(name = "lembretes") Lembretes lembretes) {
        return bean.createLembrete(lembretes);
    }

    @WebMethod(operationName = "editLembrete")
    public boolean editLembrete(@WebParam(name = "lembretes") Lembretes lembretes) {
        return bean.editLembrete(lembretes);
    }

    @WebMethod(operationName = "removeLembrete")
    public boolean removeLembrete(@WebParam(name = "lembretes") Lembretes lembretes) {
        return bean.removeLembrete(lembretes);
    }

    @WebMethod(operationName = "findLembreteById")
    public Lembretes findLembreteById(@WebParam(name = "idlembrete") int idlembrete) {
        return bean.findLembreteById(idlembrete);
    }
}
