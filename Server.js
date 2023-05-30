const express = require('express');
const app = express();
const port = 3000;

const { Pool } = require('pg');
const pool = new Pool({
  user: 'your_postgresql_username',
  host: 'localhost',
  database: 'your_database_name',
  password: 'your_postgresql_password',
  port: 5432,
});

app.use(express.json());

// GET-route om alle gegevens op te halen
app.get('/data', async (req, res) => {
  try {
    const result = await pool.query('SELECT * FROM data');
    res.json(result.rows);
  } catch (error) {
    console.error('Error executing query', error);
    res.status(500).json({ error: 'Internal server error' });
  }
});

// POST-route om nieuwe gegevens op te slaan
app.post('/data', async (req, res) => {
  const { value } = req.body;

  try {
    const result = await pool.query('INSERT INTO data (value) VALUES ($1) RETURNING *', [value]);
    res.json(result.rows[0]);
  } catch (error) {
    console.error('Error executing query', error);
    res.status(500).json({ error: 'Internal server error' });
  }
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
