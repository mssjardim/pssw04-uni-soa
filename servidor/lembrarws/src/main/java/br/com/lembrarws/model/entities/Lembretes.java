/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.lembrarws.model.entities;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Marco
 */
@Entity
@Table(name = "lembretes")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Lembretes.findAll", query = "SELECT l FROM Lembretes l"),
    @NamedQuery(name = "Lembretes.findByIdlembrete", query = "SELECT l FROM Lembretes l WHERE l.idlembrete = :idlembrete"),
    @NamedQuery(name = "Lembretes.findByTitulo", query = "SELECT l FROM Lembretes l WHERE l.titulo = :titulo"),
    @NamedQuery(name = "Lembretes.findByData", query = "SELECT l FROM Lembretes l WHERE l.data = :data")})
public class Lembretes implements Serializable {
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idlembrete")
    private Integer idlembrete;
    @Size(max = 2147483647)
    @Column(name = "titulo")
    private String titulo;
    @Column(name = "data")
    @Temporal(TemporalType.TIMESTAMP)
    private Date data;
    @JoinColumn(name = "idusuario", referencedColumnName = "idusuario")
    @ManyToOne(fetch = FetchType.EAGER)
    private Usuarios idusuario;

    public Lembretes() {
    }

    public Lembretes(Integer idlembrete) {
        this.idlembrete = idlembrete;
    }

    public Integer getIdlembrete() {
        return idlembrete;
    }

    public void setIdlembrete(Integer idlembrete) {
        this.idlembrete = idlembrete;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public Date getData() {
        return data;
    }

    public void setData(Date data) {
        this.data = data;
    }

    public Usuarios getIdusuario() {
        return idusuario;
    }

    public void setIdusuario(Usuarios idusuario) {
        this.idusuario = idusuario;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idlembrete != null ? idlembrete.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Lembretes)) {
            return false;
        }
        Lembretes other = (Lembretes) object;
        if ((this.idlembrete == null && other.idlembrete != null) || (this.idlembrete != null && !this.idlembrete.equals(other.idlembrete))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.com.lembrarws.model.entities.Lembretes[ idlembrete=" + idlembrete + " ]";
    }
    
}
