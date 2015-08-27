/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.model.facades;

import br.com.lembrarws.model.entities.Usuarios;
import java.util.List;
import javax.ejb.Local;

/**
 *
 * @author Marco
 */
@Local
public interface UsuariosFacadeLocal {

    boolean create(Usuarios usuarios);

    boolean edit(Usuarios usuarios);

    boolean remove(Usuarios usuarios);

    Usuarios find(Object id);

    List<Usuarios> findAll();

    List<Usuarios> findRange(int[] range);

    int count();

    Usuarios findByEmail(String email);

}
