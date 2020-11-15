import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DataBase {
	private String connectionURL;
	private String nomUtilisateur;
	private String motDePasse;
	
	public DataBase(String url, String nomUtil,String mDP) {
		this.connectionURL = url;
		this.nomUtilisateur = nomUtil;
		this.motDePasse = mDP;
	}
	
	public Connection connection() throws SQLException {
		return DriverManager.getConnection(this.connectionURL, this.nomUtilisateur, this.motDePasse);
	}
}
