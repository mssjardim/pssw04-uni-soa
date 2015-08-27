/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.model.facades;

import java.util.List;
import javax.persistence.EntityManager;

/**
 *
 * @author Marco
 */
public abstract class AbstractFacade<T> {

    private Class<T> entityClass;

    public AbstractFacade(Class<T> entityClass) {
        this.entityClass = entityClass;
    }

    protected abstract EntityManager getEntityManager();

    public boolean create(T entity) {
        boolean resultado;
        try {
            getEntityManager().persist(entity);
            resultado = true;
        } catch (Exception e) {
            resultado = false;
            e.printStackTrace(System.out);
        }
        return resultado;
    }

    public boolean edit(T entity) {
        boolean resultado;
        try {
            getEntityManager().merge(entity);
            resultado = true;
        } catch (Exception e) {
            resultado = false;
            e.printStackTrace(System.out);
        }
        return resultado;
    }

    public boolean remove(T entity) {
        boolean resultado;
        try {
            getEntityManager().remove(getEntityManager().merge(entity));
            resultado = true;
        } catch (Exception e) {
            e.printStackTrace(System.out);
            resultado = false;
        }
        return resultado;
    }

    public T find(Object id) {
        return getEntityManager().find(entityClass, id);
    }

    public List<T> findAll() {
        javax.persistence.criteria.CriteriaQuery cq = getEntityManager().getCriteriaBuilder().createQuery();
        cq.select(cq.from(entityClass));
        return getEntityManager().createQuery(cq).getResultList();
    }

    public List<T> findRange(int[] range) {
        javax.persistence.criteria.CriteriaQuery cq = getEntityManager().getCriteriaBuilder().createQuery();
        cq.select(cq.from(entityClass));
        javax.persistence.Query q = getEntityManager().createQuery(cq);
        q.setMaxResults(range[1] - range[0] + 1);
        q.setFirstResult(range[0]);
        return q.getResultList();
    }

    public int count() {
        javax.persistence.criteria.CriteriaQuery cq = getEntityManager().getCriteriaBuilder().createQuery();
        javax.persistence.criteria.Root<T> rt = cq.from(entityClass);
        cq.select(getEntityManager().getCriteriaBuilder().count(rt));
        javax.persistence.Query q = getEntityManager().createQuery(cq);
        return ((Long) q.getSingleResult()).intValue();
    }

}
