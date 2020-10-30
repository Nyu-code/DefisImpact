import java.util.ArrayList;

public class ODD {
	private String rep;
    private int id;
    private ArrayList <SousODD> listeSsoDD;

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
        this.listeSsoDD = liste;
    }
}