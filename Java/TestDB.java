  
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

public class TestDB {
	public static void main(String[] args) {
		DataBase db = new DataBase("jdbc:postgresql://192.168.56.1:5432/odd_defis_impact", "postgres", "defisimpact");
		
		try {
			Connection connection = db.connection();
			System.out.println("Connected");
			
			String sql = "SELECT * FROM ind_sdg where sdg = 2";
			
			Statement statement = connection.createStatement();
			ResultSet resultat = statement.executeQuery(sql);
			
			while (resultat.next()) {
				String numOdd = resultat.getString("sdg");
				String nomInd = resultat.getString("indicator");
				String descInd= resultat.getString("indicator_description");
				
				
				System.out.println("Odd " + numOdd + " : " + nomInd + " - " + descInd);
			}
			
			
			
		} catch (SQLException e) {
			System.out.println("Not connected");
			e.printStackTrace();
		}
	}
}