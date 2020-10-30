import java.util.ArrayList;

public class ODD {
	private String rep;
    private int id;
    private ArrayList <SousODD> listeSsODD;

	public ODD(String r, int i,ArrayList <SousODD> liste) {
		this.setRep(r);
        this.setId(i);
        this.setListeSsODD(liste);
	}

	public String getRep() {
		return rep;
	}

	public int getId() {
		return id;
	}

	public void setRep(String rep) {
		this.rep = rep;
	}

	public void setId(int id) {
		this.id = id;
    }
    
    public void setListeSsODD(ArrayList <SousODD> liste){
        this.listeSsODD = liste;
    }

    public void ajouterSosODD(SousODD ssODD){
        this.listeSsODD.add(ssODD);
    }

    public void supprimerSousODD(SousODD ssODD){
        for(SousODD sousodd:listeSsODD){
            if(sousodd.getId() == ssODD.getId()){
              this.listeSsODD.remove(ssODD); 
              break;
            }
        }
    }

}