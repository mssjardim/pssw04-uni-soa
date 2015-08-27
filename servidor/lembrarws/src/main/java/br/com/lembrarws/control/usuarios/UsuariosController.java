/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.control.usuarios;

import br.com.lembrarws.model.entities.Usuarios;
import br.com.lembrarws.model.facades.UsuariosFacadeLocal;
import java.util.List;
import javax.ejb.EJB;
import javax.ejb.Stateless;

/**
 *
 * @author Marco
 */
@Stateless
public class UsuariosController {

    @EJB
    private UsuariosFacadeLocal usuariosFacadeLocal;

    public Usuarios findUsuarioByEmail(String email) {
        return usuariosFacadeLocal.findByEmail(email);
    }

    public List<Usuarios> listUsuarios() {
        return usuariosFacadeLocal.findAll();
    }

    public boolean createUsuario(Usuarios usuarios) {
        return usuariosFacadeLocal.create(usuarios);
    }

    public boolean editUsuario(Usuarios usuarios) {
        return usuariosFacadeLocal.create(usuarios);
    }
}
