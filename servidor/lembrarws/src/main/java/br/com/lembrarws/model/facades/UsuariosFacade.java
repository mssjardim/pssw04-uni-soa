/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.model.facades;

import br.com.lembrarws.model.entities.Usuarios;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.PersistenceContext;

/**
 *
 * @author Marco
 */
@Stateless
public class UsuariosFacade extends AbstractFacade<Usuarios> implements UsuariosFacadeLocal {

    @PersistenceContext(unitName = "lembrarPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public UsuariosFacade() {
        super(Usuarios.class);
    }

    @Override
    public Usuarios findByEmail(String email) {
        Usuarios usuarios;
//        usuarios.setIdusuario(1);
//        usuarios.setEmail("santarelle@gmail.com");
//        usuarios.setNome("Marco");
        try {
            usuarios = (Usuarios) em.createNativeQuery("SELECT t.* FROM Usuarios t WHERE t.email = :email", Usuarios.class)
                    .setParameter("email", email)
                    .getSingleResult();
        } catch (NoResultException e) {
            usuarios = null;
        }

        return usuarios;
    }

}
