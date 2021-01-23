import java.util.ArrayList;

public class ODD {
	private String rep;
	private int id;
	private ArrayList<String[]> sousODD;
	
	public ODD(String r, int i) {
		this.setRep(r);
		this.setId(i);
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
}
