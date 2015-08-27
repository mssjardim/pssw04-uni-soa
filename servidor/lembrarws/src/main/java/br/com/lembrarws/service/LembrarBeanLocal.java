/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.service;

import br.com.lembrarws.model.entities.Lembretes;
import br.com.lembrarws.model.entities.Usuarios;
import java.util.List;
import javax.ejb.Local;

/**
 *
 * @author Marco
 */
@Local
public interface LembrarBeanLocal {

    String teste(String str);

    Usuarios findUsuariosByEmail(String email);

    List<Usuarios> listUsuarios();

    boolean createUsuario(Usuarios usuario);

    boolean editUsuario(Usuarios usuario);

    List<Lembretes> listLembretesByIdusuario(int idusuario);

    boolean createLembrete(Lembretes lembretes);

    boolean editLembrete(Lembretes lembretes);

    boolean removeLembrete(Lembretes lembretes);
}
