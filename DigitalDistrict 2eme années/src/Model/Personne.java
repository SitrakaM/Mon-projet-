package Model;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Personne {
    static DBConnection db = new DBConnection();
    
    static String DBtablePersonne="personne";

	String DBnom="Lastname";

	String DBprenom="Firstname";

	String DBprofession="Profession";

	String DBnationalite="Nationalite";

	String DBsexe="Sexe";

	String DBdateNaissance="Birthday";

	String DBlieuNaissance="Birthplace";

	String DBlogement="adress";

	String DBCIN="CIN";
    static String DBtablePere="pere";

	static String DBtableMere="mere";

	String DBnomPere="Nom";

	String DBnomMere="Nom";

	String DBProfPere="Prof_pere";

	String DBProfMere="Prof_mere";
    static String DBidPersonne="id";

	static String DBidPere="id";

	static String DBidMere="id";

	String DBnumroCarnet="Numero_carnet";

    private String nom;
    private String prenom;
    private String profession;
    private String nationalite;
    private String sexe;
    private String dateNaissance;
    private String lieuNaissance;
    private String logement;
    private String CIN;
    private String nomPere;
    private String profPere;
    private String nomMere;
    private String profMere;
    private String numeroCarnet;

    public Personne(String nom, String prenom, String profession, String nationalite, String sexe, String dateNaissance, String lieuNaissance, String logement, String CIN, String nomPere, String profPere, String nomMere, String profMere, String numeroCarnet) {
        this.nom = nom;
        this.prenom = prenom;
        this.profession = profession;
        this.nationalite = nationalite;
        this.sexe = sexe;
        this.dateNaissance = dateNaissance;
        this.lieuNaissance = lieuNaissance;
        this.logement = logement;
        this.CIN = CIN;
        this.nomPere = nomPere;
        this.profPere = profPere;
        this.nomMere = nomMere;
        this.profMere = profMere;
        this.numeroCarnet = numeroCarnet;
    }

    

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getProfession() {
        return profession;
    }

    public void setProfession(String profession) {
        this.profession = profession;
    }

    public String getNationalite() {
        return nationalite;
    }

    public void setNationalite(String nationalite) {
        this.nationalite = nationalite;
    }

    public String getSexe() {
        return sexe;
    }

    public void setSexe(String sexe) {
        this.sexe = sexe;
    }

    public String getDateNaissance() {
        return dateNaissance;
    }

    public void setDateNaissance(String dateNaissance) {
        this.dateNaissance = dateNaissance;
    }

    public String getLieuNaissance() {
        return lieuNaissance;
    }

    public void setLieuNaissance(String lieuNaissance) {
        this.lieuNaissance = lieuNaissance;
    }

    public String getLogement() {
        return logement;
    }

    public void setLogement(String logement) {
        this.logement = logement;
    }

    public String getCIN() {
        return CIN;
    }

    public void setCIN(String CIN) {
        this.CIN = CIN;
    }

    public String getNomPere() {
        return nomPere;
    }

    public void setNomPere(String nomPere) {
        this.nomPere = nomPere;
    }

    public String getProfPere() {
        return profPere;
    }

    public void setProfPere(String profPere) {
        this.profPere = profPere;
    }

    public String getNomMere() {
        return nomMere;
    }

    public void setNomMere(String nomMere) {
        this.nomMere = nomMere;
    }

    public String getProfMere() {
        return profMere;
    }

    public void setProfMere(String profMere) {
        this.profMere = profMere;
    }

    public String getNumeroCarnet() {
        return numeroCarnet;
    }

    public void setNumeroCarnet(String numeroCarnet) {
        this.numeroCarnet = numeroCarnet;
    }
    
    private int getId(String tmpcin){
        ResultSet rs=null;
        int ide=0;
        try {
            String sql="SELECT * FROM personne WHERE Numero_carnet='"+this.numeroCarnet+"'";
            rs= db.getCon().createStatement().executeQuery(sql);
            while(rs.next()){
            ide=rs.getInt(1);
            }
        } catch (Exception e) {
        }
        return ide;
    }
    public void Enregistrer(){
        try{
            ResultSet rs=db.getCon().createStatement().executeQuery("SELECT * FROM personne WHERE Lastname='"+nom+"' AND Firstname='"+prenom+"';");
            int cpt=0;
            while(rs.next()) {
            	cpt++;
            }
            if(cpt==0) {
            	int sex=1;
                if(sexe.equals("Vavy"))
                    sex=0;
                Statement stm=null;
                stm=db.getCon().createStatement();
                String sqlINSERT="INSERT INTO "+DBtablePersonne+" ("+DBnom+","+DBprenom+","+DBprofession+","+DBnationalite+","+DBsexe+","+DBdateNaissance+","+DBlieuNaissance+","+DBlogement+","+DBCIN+","+DBnumroCarnet+")";
                String sqlVALUES=" VALUES ('"+this.nom+"','"+this.prenom+"','"+this.profession+"','"+this.nationalite+"','"+sex+"','"+this.dateNaissance+"','"+this.lieuNaissance+"','"+this.logement+"','"+this.CIN+"','"+this.numeroCarnet+"');";
                stm.executeUpdate(sqlINSERT+sqlVALUES);
                stm.executeUpdate("INSERT INTO "+DBtablePere+" ("+DBnomPere+","+DBProfPere+",id_fils) VALUES('"+this.nomPere+"','"+this.profPere+"',"+getId(this.CIN)+");");
                stm.executeUpdate("INSERT INTO "+DBtableMere+" ("+DBnomMere+","+DBProfMere+",id_fils) VALUES('"+this.nomMere+"','"+this.profMere+"',"+getId(this.CIN)+");");
                
                String nomCo= this.getNom()+" "+this.getPrenom();
                String action ="Nampidirina tao anaty lisitra i "+nomCo;
                Historiques.createHistorique(action);
            }
        }catch (SQLException e){
            e.printStackTrace();
        }
    }
    public static void Supprimer(int id){
        try{
            Statement stm=db.getCon().createStatement();
            String sql="SELECT * FROM personne WHERE id='"+id+"'";
            ResultSet rs=db.getCon().createStatement().executeQuery(sql);
            String nomCo="";
            while(rs.next()) {
            String nom=rs.getString(2);
            String prenom=rs.getString(3);
            nomCo= nom+" "+prenom;
            }
            String action ="Nofafana tao anaty lisitra i "+nomCo;
            Historiques.createHistorique(action);
            
            
            stm.executeUpdate("DELETE FROM "+DBtablePere+" WHERE "+DBidPere+"="+id+";");
            stm.executeUpdate("DELETE FROM "+DBtableMere+" WHERE "+DBidMere+"="+id+";");
            stm.executeUpdate("DELETE FROM "+DBtablePersonne+" WHERE "+DBidPersonne+"="+id+";");
            
 
            

        }catch (SQLException e){
            e.printStackTrace();
        }
    }

}
