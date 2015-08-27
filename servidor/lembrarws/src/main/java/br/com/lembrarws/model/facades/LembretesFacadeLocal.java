/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.model.facades;

import br.com.lembrarws.model.entities.Lembretes;
import java.util.List;
import javax.ejb.Local;

/**
 *
 * @author Marco
 */
@Local
public interface LembretesFacadeLocal {

    void create(Lembretes lembretes);

    void edit(Lembretes lembretes);

    void remove(Lembretes lembretes);

    Lembretes find(Object id);

    List<Lembretes> findAll();

    List<Lembretes> findRange(int[] range);

    int count();
    
}
