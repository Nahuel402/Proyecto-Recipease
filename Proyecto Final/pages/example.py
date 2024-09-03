import os
import warnings

warnings.filterwarnings('ignore')

from langchain_core.messages import HumanMessage
from langchain_openai import ChatOpenAI
from langchain.chains.summarize import load_summarize_chain
from langchain_community.document_loaders import WebBaseLoader

os.environ['OPENAI_API_KEY'] = 'poner api'

llm = ChatOpenAI(model="gpt-4o-mini")


prompt = "hola cuales son los colores primarios?"

res = llm.invoke(
    [
        HumanMessage(
            content=[
                {"type": "text", "text": prompt},
               
            ]
        )
    ]
)


print(res.content)