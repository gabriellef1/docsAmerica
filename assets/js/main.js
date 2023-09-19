const express = require('express');
const AWS = require('aws-sdk');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Configuração do AWS SDK
AWS.config.update({
  accessKeyId: 'YOUR_ACCESS_KEY',
  secretAccessKey: 'YOUR_SECRET_KEY',
  region: 'us-east-1' // Substituir pela minha região 
});

const dynamodb = new AWS.DynamoDB.DocumentClient();

// Nome da tabela no DynamoDB
const tableName = 'Documents';

app.use(bodyParser.json());

// Listar todos os documentos
app.get('/documents', async (req, res) => {
  const params = {
    TableName: tableName
  };

  try {
    const data = await dynamodb.scan(params).promise();
    res.json(data.Items);
  } catch (error) {
    console.error('Erro ao listar documentos: ', error);
    res.status(500).json({ error: 'Erro ao listar documentos.' });
  }
});

// Obter um documento por ID
app.get('/documents/:id', async (req, res) => {
  const id = req.params.id;

  const params = {
    TableName: tableName,
    Key: { id }
  };

  try {
    const data = await dynamodb.get(params).promise();
    if (data.Item) {
      res.json(data.Item);
    } else {
      res.status(404).json({ message: 'Documento não encontrado' });
    }
  } catch (error) {
    console.error('Erro ao obter documento: ', error);
    res.status(500).json({ error: 'Erro ao obter documento.' });
  }
});

// Criar um novo documento
app.post('/documents', async (req, res) => {
  const newDocument = req.body;

  const params = {
    TableName: tableName,
    Item: newDocument
  };

  try {
    await dynamodb.put(params).promise();
    res.status(201).json(newDocument);
  } catch (error) {
    console.error('Erro ao criar documento: ', error);
    res.status(500).json({ error: 'Erro ao criar documento.' });
  }
});

// Atualizar um documento
app.put('/documents/:id', async (req, res) => {
  const id = req.params.id;
  const updatedDocument = req.body;

  const params = {
    TableName: tableName,
    Key: { id },
    UpdateExpression: 'set #title = :title',
    ExpressionAttributeNames: { '#title': 'title' },
    ExpressionAttributeValues: { ':title': updatedDocument.title },
    ReturnValues: 'ALL_NEW'
  };

  try {
    const data = await dynamodb.update(params).promise();
    res.json(data.Attributes);
  } catch (error) {
    console.error('Erro ao atualizar documento: ', error);
    res.status(500).json({ error: 'Erro ao atualizar documento.' });
  }
});

// Deletar um documento
app.delete('/documents/:id', async (req, res) => {
  const id = req.params.id;

  const params = {
    TableName: tableName,
    Key: { id },
    ReturnValues: 'ALL_OLD'
  };

  try {
    const data = await dynamodb.delete(params).promise();
    if (data.Attributes) {
      res.json({ message: 'Documento deletado com sucesso' });
    } else {
      res.status(404).json({ message: 'Documento não encontrado' });
    }
  } catch (error) {
    console.error('Erro ao deletar documento: ', error);
    res.status(500).json({ error: 'Erro ao deletar documento.' });
  }
});

app.listen(port, () => {
  console.log(`Servidor rodando na porta ${port}`);
});
