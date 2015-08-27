/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.service;

import br.com.lembrarws.control.lembretes.LembretesController;
import br.com.lembrarws.control.usuarios.UsuariosController;
import br.com.lembrarws.model.entities.Lembretes;
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
    @EJB
    private LembretesController lembretesController;

    @Override
    public String teste(String str) {
        return "Teste de web service: " + str;
    }

    @Override
    public Usuarios findUsuariosByEmail(String email) {
        return usuariosController.findUsuarioByEmail(email);
    }

    @Override
    public List<Usuarios> listUsuarios() {
        return usuariosController.listUsuarios();
    }

    @Override
    public boolean createUsuario(Usuarios usuario) {
        return usuariosController.createUsuario(usuario);
    }

    @Override
    public boolean editUsuario(Usuarios usuario) {
        return usuariosController.editUsuario(usuario);
    }

    @Override
    public List<Lembretes> listLembretesByIdusuario(int idusuario) {
        return lembretesController.listLembretesByIdusuario(idusuario);
    }

    @Override
    public boolean createLembrete(Lembretes lembretes) {
        return lembretesController.createLembrete(lembretes);
    }

    @Override
    public boolean editLembrete(Lembretes lembretes) {
        return lembretesController.editLembrete(lembretes);
    }

    @Override
    public boolean removeLembrete(Lembretes lembretes) {
        return lembretesController.removeLembrete(lembretes);
    }

}
