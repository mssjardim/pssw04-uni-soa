/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.control.lembretes;

import br.com.lembrarws.model.entities.Lembretes;
import br.com.lembrarws.model.facades.LembretesFacadeLocal;
import java.util.List;
import javax.ejb.EJB;
import javax.ejb.Stateless;

/**
 *
 * @author Marco
 */
@Stateless
public class LembretesController {

    @EJB
    private LembretesFacadeLocal lembretesFacadeLocal;

    public List<Lembretes> listLembretesByIdusuario(int idusuario) {
        return lembretesFacadeLocal.listLembretesByIdusuario(idusuario);
    }

    public boolean createLembrete(Lembretes lembretes) {
        return lembretesFacadeLocal.create(lembretes);
    }

    public boolean editLembrete(Lembretes lembretes) {
        return lembretesFacadeLocal.edit(lembretes);
    }

    public boolean removeLembrete(Lembretes lembretes) {
        return lembretesFacadeLocal.remove(lembretes);
    }

}
