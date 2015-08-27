/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.service;

import br.com.lembrarws.control.usuarios.UsuariosController;
import br.com.lembrarws.model.entities.Usuarios;
import java.util.List;
import javax.ejb.EJB;
import javax.ejb.Stateless;

/**
 *
 * @author Marco
 */
@Stateless
public class LembrarBean implements LembrarBeanLocal {

    @EJB
    private UsuariosController usuariosController;

    @Override
    public String bean(String str) {
        return "LembrarBean " + str;
    }

    @Override
    public Usuarios findUsuariosByEmail(String email) {
        return usuariosController.findUsuarioByEmail(email);
    }

    @Override
    public List<Usuarios> listUsuarios() {
        return usuariosController.listUsuarios();
    }
}
