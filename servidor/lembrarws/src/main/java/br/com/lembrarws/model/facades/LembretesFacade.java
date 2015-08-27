/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.model.facades;

import br.com.lembrarws.model.entities.Lembretes;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

/**
 *
 * @author Marco
 */
@Stateless
public class LembretesFacade extends AbstractFacade<Lembretes> implements LembretesFacadeLocal {

    @PersistenceContext(unitName = "lembrarPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public LembretesFacade() {
        super(Lembretes.class);
    }

}
